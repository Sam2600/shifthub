@extends('layouts.master')

@section('content')
    <div class=" my-3 row align-items-center">

        <div class="col-md-6">
            <h4 class="text-dark my-4">
                <i class="material-icons" style="vertical-align: -4px">person</i>
                {{ __('messages.CreateEmployeeRegisterationForm') }}
            </h4>
        </div>

        <div class="col-md-6 text-end">
            <a class="btn create" href="{{ route('employees.index', ['page' => $page]) }}">
                Back to index
            </a>
        </div>

    </div>

    <div class="shadow p-3 row mb-5 bg-white rounded" style="background: #e8ebe8">

        <div class="col-md-10 offset-md-2">

            @if (Session::has('register_error'))
                <div class=" text-center alert alert-warning alert-dismissible fade show col-md-8 offset-md-2"
                    role="alert">
                    {{ Session::get('register_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="col-md-6">
                <img class="img-account-profile rounded-circle mb-2" id="preview" src="#" alt="employee photo"
                    style="display: none">
            </div>


            <form class="row g-5" action="{{ route('employees.index', ['page' => $page]) }}" id="register-form"
                method="POST" enctype="multipart/form-data">

                @csrf


                <div class="col-md-5">
                    <label for="photo" class="form-label">{{ __('messages.CreatePhoto') }}<span
                            class="required">*</span></label>
                    <input type="file" class="form-control @if ($errors->has('photo')) is-invalid @endif"
                        id="photo" name="photo" value="{{ old('photo') }}" accept="image/*">
                    @error('photo')
                        <div id="photoHelp" class="form-text text-danger">{{ $errors->first('photo') }}</div>
                    @enderror
                </div>

                <div class="col-md-3"></div>

                <div class="col-md-5">
                    <label for="id" class="form-label">{{ __('messages.CreateId') }}<span
                            class="required">*</span></label>
                    <input type="text" class="form-control @if ($errors->has('id')) is-invalid @endif"
                        id="id" name="employee_id" value="{{ $employee_id }}" disabled>
                    @error('id')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('id') }}</div>
                    @enderror
                </div>

                <div class="col-md-5">
                    <label for="name" class="form-label">{{ __('messages.CreateName') }}<span
                            class="required">*</span></label>
                    <input type="text" maxlength="25"
                        class="form-control @if ($errors->has('name')) is-invalid @endif" id="name"
                        name="name" value="{{ old('name') }}">
                    @error('name')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('name') }}</div>
                    @enderror
                </div>

                <div class="col-md-5">
                    <label for="email" class="form-label">{{ __('messages.CreateEmail') }}<span
                            class="required">*</span></label>
                    <input maxlength="40" class="form-control @if ($errors->has('email')) is-invalid @endif"
                        id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('email') }}</div>
                    @enderror
                </div>

                <div class="col-md-5">
                    <label for="phone" class="form-label">{{ __('messages.CreatePhone') }}<span
                            class="required">*</span></label>

                    <input type="text" maxlength="14"
                        class="form-control @if ($errors->has('phone')) is-invalid @endif" id="phone"
                        name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('phone') }}</div>
                    @enderror

                </div>

                <div class="col-md-5">
                    <label for="dateOfBirth" class="form-label">{{ __('messages.CreateDateOfBirth') }}<span
                            class="required">*</span></label>

                    <input type="date" class="form-control @if ($errors->has('dateOfBirth')) is-invalid @endif"
                        id="dateOfBirth" name="dateOfBirth" value="{{ old('dateOfBirth') }}">
                    @error('dateOfBirth')
                        <div id="employee_idHelp" class="form-text text-danger">
                            {{ $errors->first('dateOfBirth') }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-5">
                    <label for="nrc" class="form-label">{{ __('messages.CreateNRC') }}<span
                            class="required">*</span></label>

                    <input type="text" class="form-control @if ($errors->has('nrc')) is-invalid @endif"
                        id="nrc" name="nrc" value="{{ old('nrc') }}">
                    @error('nrc')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('nrc') }}</div>
                    @enderror

                </div>

                <div class="col-md-5">
                    <label>{{ __('messages.CreateLanguage') }}<span class="required">*</span></label>
                    <input class="form-check-input ms-4 @if ($errors->has('language')) is-invalid @endif"
                        type="checkbox" id="J_language" name="language[]" value="Japan"
                        {{ is_array(old('language')) && in_array('Japan', old('language')) ? 'checked' : '' }}>
                    <label class="form-check-label" style="font-weight: 360"
                        for="J_language">{{ __('messages.CreateLanguageEnglish') }}</label>


                    <input class="form-check-input ms-4 @if ($errors->has('language')) is-invalid @endif"
                        type="checkbox" id="E_language" name="language[]" value="English"
                        {{ is_array(old('language')) && in_array('English', old('language')) ? 'checked' : '' }}>
                    <label class="form-check-label" style="font-weight: 360"
                        for="E_language">{{ __('messages.CreateLanguageJapan') }}</label>

                    @error('language')
                        <div id="employee_idHelp" class="form-text text-danger my-3">{{ $errors->first('language') }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-5">
                    <label>{{ __('messages.CreateGender') }}</label><span class="required">*</span>
                    <input class="form-check-input ms-4 @if ($errors->has('gender')) is-invalid @endif"
                        type="radio" name="gender" id="male" value="male"
                        {{ old('gender') == 'male' ? 'checked' : 'checked' }}>
                    <label class="form-check-label " for="male"
                        style="font-weight: 360">{{ __('messages.CreateGenderMale') }}</label>

                    <input class="form-check-input ms-4 @if ($errors->has('gender')) is-invalid @endif ms-3"
                        type="radio" name="gender" id="female" value="female"
                        {{ old('gender') == 'female' ? 'checked' : '' }}>
                    <label class="form-check-label" for="female"
                        style="font-weight: 360">{{ __('messages.CreateGenderFemale') }}</label>
                    @error('gender')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('gender') }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-10">
                    <label for="address" class="form-label">{{ __('messages.CreateAddress') }}<span
                            class="required">*</span></label>
                    <textarea class="form-control @if ($errors->has('address')) is-invalid @endif" maxlength="255" id="address"
                        name="address" rows="2" spellcheck="false">{{ old('address') }}</textarea>
                    @error('address')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('address') }}
                        </div>
                    @enderror
                </div>


                <div class="col-md-5">
                    <label> {{ __('messages.CreateCareer') }} <span class="required">*</span> </label>

                    <select class="form-select @if ($errors->has('career')) is-invalid @endif" name="career">
                        <option value="Frontend" {{ old('career') == 'Frontend' ? 'selected' : '' }}><label>
                                {{ __('messages.CreateCareerFrontEnd') }}</option>
                        <option value="Backend" {{ old('career') == 'Backend' ? 'selected' : '' }}><label>
                                {{ __('messages.CreateCareerBackEnd') }}</option>
                        <option value="Fullstack" {{ old('career') == 'Fullstack' ? 'selected' : '' }}><label>
                                {{ __('messages.CreateCareerFullStack') }}</option>
                        <option value="Mobile" {{ old('career') == 'Mobile' ? 'selected' : '' }}>
                            {{ __('messages.CreateCareerMobile') }}</option>
                    </select>
                    @error('career')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('career') }}
                        </div>
                    @enderror

                </div>


                <div class="col-md-5">

                    <span><label> {{ __('messages.CreateLevel') }} </label><span class="required">*</span></span>

                    <select class="form-select @if ($errors->has('level')) is-invalid @endif" name="level">
                        <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>
                            {{ __('messages.CreateLevelBeginner') }}</option>
                        <option value="Junior Engineer" {{ old('level') == 'Junior Engineer' ? 'selected' : '' }}>
                            {{ __('messages.CreateLevelJuniorEngineer') }}
                        </option>
                        <option value="Engineer" {{ old('level') == 'Engineer' ? 'selected' : '' }}>
                            {{ __('messages.CreateLevelEngineer') }}</option>
                        <option value="Senior Engineer" {{ old('level') == 'Senior Engineer' ? 'selected' : '' }}>
                            {{ __('messages.CreateLevelSeniorEnginner') }}
                        </option>
                    </select>
                    @error('level')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('level') }}
                        </div>
                    @enderror
                </div>


                <div class="col-md-10">

                    <label>{{ __('messages.CreateProgramingLanguage') }}<span class="required">*</span></label>

                    <div class="prog_lang_container my-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @if ($errors->has('prog_lang')) is-invalid @endif"
                                type="checkbox" id="Android" name="prog_lang[]" value="Android"
                                {{ is_array(old('prog_lang')) && in_array('Android', old('prog_lang')) ? 'checked' : '' }}>
                            <label class="form-check-label" style="font-weight: 360" for="Android">Android</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input @if ($errors->has('prog_lang')) is-invalid @endif"
                                type="checkbox" id="Java" name="prog_lang[]" value="Java"
                                {{ is_array(old('prog_lang')) && in_array('Java', old('prog_lang')) ? 'checked' : '' }}>
                            <label class="form-check-label" style="font-weight: 360" for="Java">Java</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input @if ($errors->has('prog_lang')) is-invalid @endif"
                                type="checkbox" id="PHP" name="prog_lang[]" value="PHP"
                                {{ is_array(old('prog_lang')) && in_array('PHP', old('prog_lang')) ? 'checked' : '' }}>
                            <label class="form-check-label" style="font-weight: 360" for="PHP">PHP</label>
                        </div>

                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input @if ($errors->has('prog_lang')) is-invalid @endif"
                                type="checkbox" id="React" name="prog_lang[]" value="React"
                                {{ is_array(old('prog_lang')) && in_array('React', old('prog_lang')) ? 'checked' : '' }}>
                            <label class="form-check-label" style="font-weight: 360" for="React">React</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @if ($errors->has('prog_lang')) is-invalid @endif"
                                type="checkbox" id="Laravel" name="prog_lang[]" value="Laravel"
                                {{ is_array(old('prog_lang')) && in_array('Laravel', old('prog_lang')) ? 'checked' : '' }}>
                            <label class="form-check-label" style="font-weight: 360" for="Laravel">Laravel</label>
                        </div>
                        <div class="form-check form-check-inline ms-3">
                            <input class="form-check-input @if ($errors->has('prog_lang')) is-invalid @endif"
                                type="checkbox" id="C++" name="prog_lang[]" value="C++"
                                {{ is_array(old('prog_lang')) && in_array('"C++', old('prog_lang')) ? 'checked' : '' }}>
                            <label class="form-check-label" style="font-weight: 360" for="C++">C++</label>
                        </div>
                    </div>

                    @error('prog_lang')
                        <div id="employee_idHelp" class="form-text text-danger">{{ $errors->first('prog_lang') }}
                        </div>
                    @enderror

                </div>

                <div>
                    <button type="submit" class="btn save">{{ __('messages.CreateCreateButton') }}</button>

                    <a href="{{ url('employees/register') }}"
                        class="btn btn-secondary reset ms-3">{{ __('messages.CreateResetButton') }}</a>
                </div>
            </form>

        </div>
    </div>
@endsection

<script>
    window.addEventListener('DOMContentLoaded', function() {

        var dateOfBirthInput = document.getElementById('dateOfBirth');
        var hasManuallySetDate = false;

        dateOfBirthInput.addEventListener('input', function() {
            hasManuallySetDate = true;
        });

        dateOfBirthInput.addEventListener('focus', function() {
            if (!hasManuallySetDate) {
                var currentDate = new Date();
                currentDate.setFullYear(2005);
                this.valueAsDate = currentDate;
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Get the file input element
        var input = document.getElementById('photo');

        // Add an event listener for when a file is selected
        input.addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();

            // Set up the FileReader onload event
            reader.onload = function(e) {
                var previewImage = document.getElementById('preview');
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            // Read the image file as a data URL
            reader.readAsDataURL(file);
        });
    });
</script>
