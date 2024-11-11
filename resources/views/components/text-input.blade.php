@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-[#F6E5EE] border-gray-300 focus:border-[#694F8E] focus:ring-[#694F8E] rounded-md shadow-sm']) }}>
