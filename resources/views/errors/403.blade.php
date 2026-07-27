@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code','403')
@section('title_error','Forbidden Error')
@section('desc_error','Access to this resource on the server is denield!')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
