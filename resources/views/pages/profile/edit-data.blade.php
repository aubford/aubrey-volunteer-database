<?php

use App\Helpers;

?>

@extends('app')

@section('content')
    <h1>Additional Profile Information</h1>
    <hr>

    {!! Form::open(['url' => 'profile/edit']) !!}
        <input type="hidden" name="type" value="data">

        @include('partials/form/text',
        [
            'name' => 'full_name',
            'label' => 'Full Name (Required)',
            'placeholder' => 'Your name in the Default World',
            'help' => "Required. Your full name is used for reporting and ticketing purposes",
            'value' => (is_null($user->data)) ? '' : $user->data->full_name
        ])

        @include('partials/form/text',
        [
            'name' => 'burner_name',
            'label' => 'Burner Name',
            'placeholder' => 'Your name on the Playa',
            'help' => "This name will be shown to other users when you sign up for a shift",
            'value' => Helpers::displayName($user)
        ])

        @include('partials/form/text',
        [
            'name' => 'camp',
            'label' => 'Facebook Name/Some Internet Contact Method (Please provide, this will help leadership not have to be middleman for shift swaps!)',
            'placeholder' => 'Aubrey Car',
            'value' => (is_null($user->data)) ? '' : $user->data->camp
        ])

        @include('partials/form/text',
        [
            'name' => 'phone',
            'label' => 'Phone Number',
            'value' => (is_null($user->data)) ? '' : $user->data->phone
        ])

        @include('partials/form/text',
        [
            'name' => 'emergency_name',
            'label' => 'Emergency Contact',
            'value' => (is_null($user->data)) ? '' : $user->data->emergency_name
        ])

        @include('partials/form/text',
        [
            'name' => 'emergency_phone',
            'label' => 'Emergency Phone Number',
            'value' => (is_null($user->data)) ? '' : $user->data->emergency_phone
        ])

        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="/profile" class="btn btn-primary">Cancel</a>
    {!! Form::close() !!}
@endsection
