@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code','429')
@section('title_error','To Many Request')
@section('desc_error',"Error! There was a problem with the server")
@section('message', __('Too Many Requests'))
