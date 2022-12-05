@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'input']) !!}>

<style>
    .input {
        border: 1px solid black;
    }
</style>