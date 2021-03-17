<div class="col-md-6 mb-3">
    <label for="first_name" class="form-label">First Name <span>*</span></label>
    <input type="text" class="form-control" id="first_name" name="first_name"
           value="{{ $user->first_name??old('first_name') }}"
           placeholder="Enter First Name">
    @error('first_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="last_name" class="form-label">Last Name <span>*</span></label>
    <input type="text" class="form-control" id="last_name" name="last_name"
           value="{{ $user->last_name??old('last_name') }}"
           placeholder="Enter Last Name">
    @error('last_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror

</div>
<div class="col-md-6 mb-3">
    <label for="dob" class="form-label">Birth Date <span>*</span></label>
    <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth"
           value="{{ $user->dob??old('dob') }}">
    @error('dob')
    <div class="text-danger">{{ $message }}</div>
    @enderror

</div>
<div class="col-md-6 mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" id="address" name="address">{!! $user->address??old('address') !!}</textarea>
</div>
<div class="col-md-6 mb-3">
    <label for="gender" class="form-label">Gender</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="male"
               value="male" {{ in_array('male',[$user->gender??null,old('gender')])?'checked':null }}>
        <label class="form-check-label" for="male">
            Male
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female"
            {{ in_array('female',[$user->gender??null,old('gender')])?'checked':null }}>
        <label class="form-check-label" for="female">
            Female
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="transgender" value="transgender"
            {{ in_array('transgender',[$user->gender??null,old('gender')])?'checked':null }}>
        <label class="form-check-label" for="transgender">
            TransGender
        </label>
    </div>
</div>
<div class="col-md-6 mb-3">
    <div class="input_fields_wrap">
        <label for="hobbies" class="form-label">Hobbies</label>
        <button class="add_field_button btn btn-success btn-sm float-end"><i class="fa fa-plus"></i></button>

        @if(isset($editMode))
            @foreach($user->hobbies as $hobby)
                @if($loop->first)
                    <div class="mb-3">
                        <input type="text" name="hobbies[]" class="form-control" value="{{ $hobby }}">
                    </div>
                @else
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="hobbies[]" value="{{ $hobby }}"/>
                        <div class="input-group-text p-0">
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_field"
                               title="Remove Hobby"><i
                                    class="fa fa-trash"></i></a>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="mb-3">
                <input type="text" name="hobbies[]" class="form-control">
            </div>
        @endif
    </div>
    @error('hobbies')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="location" class="form-label">Location <span>*</span></label>
    {{--{!! Form::select('location', $locations, 'india', ['class'=>'form-control','placeholder' => 'Select location']) !!}--}}
    <select name="location" id="location" class="form-control">
        @foreach($locations as $country=>$states)
            <optgroup label="{{ ucfirst($country) }}">
                @foreach($states as $state=>$cities)
                    <optgroup label="{{ ucfirst($state) }}">
                        @foreach($cities as $city)
                            <option value="{{ $country.','.$state.','.$city }}">
                                {{ ucfirst($city) }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @error('location')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mb-3">
    <label for="status" class="form-label">Status <span>*</span></label>
    {!! Form::select('status',\App\Models\User::STATUS,'active',['class'=>'form-control','placeholder'=>'Select Status']) !!}
    @error('status')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
@section('scripts')
    <script>
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var hobbyInputTemplate = $("#hobbyInputTemplate"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(hobbyInputTemplate.html()); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).closest('.input-group').remove();
            x--;
        })
    </script>
@endsection
