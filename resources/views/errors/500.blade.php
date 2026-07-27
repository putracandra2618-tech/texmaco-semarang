@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code','500')
@section('title_error','Internal Server Error')
@section('desc_error',"The server encontered an internal error or misconfiguration and was unable to complete your request")
@section('message', __('Server Error'))
