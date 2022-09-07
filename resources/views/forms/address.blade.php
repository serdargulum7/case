<input type="hidden" name="person_id" value="@if(isset($data->person_id)){{ $data->person_id }}@endif">

<div class="mb-3">
    <label for="address" class="form-label">{{ __('Address') }}</label>
    <textarea name="address" class="form-control" id="address" rows="3">@if(isset($data->address)){{ $data->address }}@endif</textarea>
</div>

<div class="mb-3">
    <label for="postcode" class="form-label">{{ __('Post Code') }}</label>
    <input type="text" name="postcode" class="form-control" id="postcode" aria-describedby="postcode" value="@if(isset($data->postcode)){{ $data->postcode }}@endif">
</div>

<div class="mb-3">
    <label for="city_name" class="form-label">{{ __('City Name') }}</label>
    <input type="text" name="city_name" class="form-control" id="city_name" aria-describedby="city_name" value="@if(isset($data->city_name)){{ $data->city_name }}@endif">
</div>

<div class="mb-3">
    <label for="country_name" class="form-label">{{ __('Country Name') }}</label>
    <input type="text" name="country_name" class="form-control" id="country_name"
           aria-describedby="country_name" value="@if(isset($data->country_name)){{ $data->country_name }}@endif">
</div>
