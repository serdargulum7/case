

<div class="mb-3">
    <label for="name" class="form-label">{{ __('Name') }}</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
           value="@if(isset($data->name)){{ $data->name }}@endif">
</div>

<div class="mb-3">
    <label for="birthday" class="form-label">{{ __('Birthday') }}</label>

    <div class="input-group date" id="datepicker">
        <input type="text" name="birthday" class="form-control" id="birthday"  value="@if(isset($data->birthday)){{ $data->birthday }}@endif">
        <span class="input-group-append">
            <span class="input-group-text bg-white d-block">
                <i class="fa fa-calendar"></i>
            </span>
        </span>
    </div>
</div>

<div class="mb-3">
    <label for="gender" class="form-label">{{ __('Gender') }}</label>
    <select name="gender" class="form-select" aria-label="Default select example" id="gender">
        <option selected>{{ __('Select') }}</option>
        <option @if(isset($data->gender) and $data->gender == 'male') selected @endif value="male">{{ __('Male') }}</option>
        <option @if(isset($data->gender) and $data->gender == 'female') selected @endif value="female">{{ __('Female') }}</option>
        <option @if(isset($data->gender) and $data->gender == 'undefined') selected
                @endif  value="undefined">{{ __('Undefined') }}</option>
    </select>
</div>
