@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-400 text-sm font-medium leading-5 text-white text-2xl focus:outline-none focus:border-red-100 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white text-2xl focus:outline-none focus:text-white focus:border-red-300  transition';
$styles = ($active ?? false)
            ? 'font-family:fantasy;border-bottom-width: 8px;border-color: rgb(255 255 255);'
            : 'font-family:fantasy;border-bottom-width: 0px;'
@endphp

  <a {{ $attributes->merge(['class' => $classes,'style'=>$styles,'id'=>'nave']) }}>
      {{ $slot }}
  </a>

<Style>
 #nave:hover{

   font-size: 1.8rem;
   line-height: 0.8;
 }
</Style>
