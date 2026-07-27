@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code','503')
@section('title_error','Service Unavailable')
@section('desc_error',"The server is temporarily busy, try again later!")
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
