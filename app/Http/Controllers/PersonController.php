<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Http\Requests\PersonRequest;
use App\Services\PersonService;
use Session;

class PersonController extends Controller
{

    protected $service;

    public function __construct(PersonService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return response()->view('person_list', [
            'personList' => $this->service->all()->paginate(5)
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
        $data = (object)Session::getOldInput();

        return response()->view('person_create', [
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonRequest $request
     * @return Response
     */
    public function store(PersonRequest $request)
    {

        $validatedData = $request->validated();

        try {
            $this->service->create($validatedData);

            return redirect()->route('home')->with([
                'message' => 'Person created.'
            ]);

        } catch (\Exception $e) {
            return redirect()->route('person.create')->withErrors([
                'message' => $e->getMessage()
            ])->withInput();;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        return response()->view('person_update', [
            'person' => $this->service->getById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonRequest $request
     * @param int $id
     * @return Response
     */
    public function update(PersonRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {

            $this->service->update($validatedData, $id);

            return redirect()->route('home')->with([
                'message' => 'Person Updated.'
            ]);

        } catch (\Exception $e) {
            return redirect()->route('person.update', ['person' => $id])->withErrors([
                'message' => $e->getMessage()
            ])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        try {

            $this->service->delete($id);

            return redirect()->route('home')->with([
                'message' => 'Person deleted.'
            ]);

        } catch (\Exception $e) {
            return redirect()->route('home')->withErrors([
                'message' => $e->getMessage()
            ]);
        }
    }
}
