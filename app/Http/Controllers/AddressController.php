<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AddressService;
use App\Http\Requests\AddressRequest;
use mysql_xdevapi\Exception;
use Session;
use function Symfony\Component\Translation\t;

class AddressController extends Controller
{
    /**
     * @var PersonService
     */
    protected $service;

    public function __construct(AddressService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        if (!isset($request->person_id)) {
            throw new \InvalidArgumentException('person_id required');
        }

        return response()->view('address_list', [
            'addressList' => $this->service->all($request->person_id)->paginate(5),
            'personId' => $request->person_id,
        ]);
    }

    /**
     * Created a new resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        if (!isset($request->person_id)) {
            throw new \InvalidArgumentException('person_id required');
        }

        $data = (object)Session::getOldInput();
        $data->person_id = $request->person_id;
        return response()->view('address_create', [
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddressRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {

        $validatedData = $request->validated();

        try {
            $this->service->create($validatedData);
            return redirect()->route('home')->with([
                'message' => 'Address created.'
            ]);

        } catch (\Exception $e) {

            return redirect()->route('address.create', ['person_id' => $request->person_id])->withErrors([
                'message' => $e->getMessage()
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return response()->view('address_update', [
            'address' => $this->service->getById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {

            $this->service->update($validatedData, $id);

            return redirect()->route('address.index', ['person_id' => $validatedData['person_id']])->with([
                'message' => 'updated'
            ]);

        } catch (\Exception $e) {
            return redirect()->route('address.update', ['address' => $id])->withErrors([
                'message' => $e->getMessage()
            ])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($address = $this->service->getById($id))) {
            return redirect()->route('home')->with(['message' => 'Address already deleted.']);
        }

        try {

            $this->service->delete($id);

            return redirect()->route('address.index', ['person_id' => $address->person_id])->with([
                'message' => 'Address deleted'
            ]);

        } catch (\Exception $e) {
            return redirect()->route('address.index', ['person_id' => $address->person_id])->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }
}
