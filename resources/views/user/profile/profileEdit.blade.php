@extends("user.templates.templateFrontEnd")
@section('style')
    <style>
        /*
        body{
            background: #E9F3F8;
        }
        .container{
            background: #FFF;
            height: auto;
            font-weight: bold;
            color: #003469;
            overflow: hidden;
            margin-top: 20px;
        }
         */
        .formcontainer{
            display:flex;
            justify-content:center;
            align-items:center;
            padding-top:20px;
        }
        .leftform{

            height: 500px;
            float:left;
        //border: 1px solid red;
        }
        .rightform{
            height: 500px;
        //border: 1px solid green;
            float: left;
        }
        .formbutton{
        //border: 1px solid blue;
            display:flex;
            justify-content:center;
            align-items:center;
            margin: 5px;
        }
        .button a{
            background: #003469;
            border: none;
            width: 275px;
            height: 70px;
            margin: 20px;
            font-weight: bold;
            display:flex;
            justify-content:center;
            align-items:center;
            color: #FFF;
            text-transform: none;
        }
        .formbutton input{
            background: #003469;
            font-weight: bold;
            color: #FFF;
            border: none;
            width: 275px;
            height: 70px;
            margin: 20px;
        }
        label.field{
            text-align: left;
            width: 150px;
            float: left;
        }
        input.textbox{
            width: 250px;
            float: left;
            padding-left: 1px;
        }
        .radiobuttons{
            width: 250px;
            float: left;
            padding-left: 1px;
            border: 1px solid #0b2e13;
            align: right;
        }
        form p{
            clear: both;
            padding: 19px;
        }
        .radiolabel{
            width: 50px;

        }
        form{
            margin-bottom: 100px;
        }

    </style>
@endsection
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @foreach($aTravellers as $traveller => $data)
            {{ Form::open(array('url' => "/profileEdit/$data->user_id", 'method' => 'post')) }}
            <div class="formcontainer">
                <div class="leftform">
                    <p><label class="field" for="name">Naam: </label>           {{ Form::text('txtLastName',    $data->lastname,    ['class' => 'textbox'] )}} </p>
                    <p><label class="field" for="name">Voornaam: </label>       {{ Form::text('txtFirstName',   $data->firstname,   ['class' => 'textbox'] )}} </p>
                    <p><label class="field" for="name">Geslacht: </label>       {{ Form::text('txtSex',         $data->sex,         ['class' => 'textbox'] )}} </p>
                    <p><label class="field" for="name">Geboortedatum: </label>  {{ Form::text('txtBirthdate',   $data->birthdate,   ['class' => 'textbox'] )}} </p>
                    <p><label class="field" for="name">Geboorteplaats: </label> {{ Form::text('txtBirthplace',  $data->birthplace,  ['class' => 'textbox'] )}} </p>
                    <p><label class="field" for="name">Nationaliteit: </label>  {{ Form::text('txtNationality', $data->nationality, ['class' => 'textbox'] )}} </p>
                    <p><label class="field" for="name">Adres:  </label>         {{ Form::text('txtAddress',     $data->address,     ['class' => 'textbox'] )}} </p>
                    <p style="padding-bottom: 0px;margin-bottom: 0px;"><label class="field" for="name">Gemeente:</label>
                        <select name="Postcode" class="select">
                            <?php
                            $aAllZip = \App\Zip::all();
                            foreach ($aAllZip as $oZip){
                            if($oZip->zip_id == $data->zip_id){
                            ?>
                            <option value="<?php echo $oZip->zip_id ?>" selected><?php echo $oZip->zip_town . " " . $oZip->zip_code ?></option>
                            <?php
                            }
                            else{
                            ?>
                            <option value="<?php echo $oZip->zip_id ?>"><?php echo $oZip->zip_town . " " . $oZip->zip_code ?></option>
                            <?php
                            }
                            }
                            ?>
                        </select>
                    </p>
                    <p><label class="field" for="name">Land: </label>           {{ Form::text('txtCountry',     $data->country,     ['class' => 'textbox'] )}} </p>
                </div>

                <div class="rightform">
                    <p>{{ Form::label('lblEmail',           'Email:',         ['class' => 'field']) }}  {{ Form::text('txtEmail',           $data->email,             ['class' => 'textbox'] )}} </p>
                    <p>{{ Form::label('lblPhone',           'Telefoon:',      ['class' => 'field']) }}  {{ Form::text('txtPhone',           $data->phone,             ['class' => 'textbox'] )}} </p>
                    <p>{{ Form::label('lblEmergencyPhone1', 'Noodnummer 1:',  ['class' => 'field']) }}  {{ Form::text('txtEmergencyPhone1', $data->emergency_phone_1, ['class' => 'textbox'] )}} </p>
                    <p>{{ Form::label('lblEmergencyPhone2', 'Noodnummer 2:',  ['class' => 'field']) }}  {{ Form::text('txtEmergencyPhone2', $data->emergency_phone_2, ['class' => 'textbox'] )}} </p>

                    <p style="padding-bottom: 0px;margin-bottom: 0px;">
                        {{ Form::label('lblMedicalIssue', 'Behandeling:',  ['class' => 'field']) }}
                        <input type="radio"  name="txtMedicalIssue" value="1" id="1" {{ $data->medical_issue == '1' ? 'checked' : '' }} > <label class="radiolabel" for="1">Ja</label>
                        <input type="radio"  name="txtMedicalIssue" value="0" id="0" {{ $data->medical_issue  == '0' ? 'checked' : '' }}> <label class="radiolabel" for="0">Nee</label>
                    </p>
                    <p>{{ Form::label('lblMedicalInfo',     'Medische info:', ['class' => 'field']) }}  {{ Form::textarea('txtMedicalInfo', $data->medical_info, ['size' => '30x5']) }}

                </div>
            </div>
            <div class="formbutton">
                <div class="button">
                    <a class="nav-link" href="/profile">Annuleren</a>
                </div>
                {{ Form::submit('Opslaan') }}
            </div>
            {{ Form::close() }}
        @endforeach
    </div>
@endsection
