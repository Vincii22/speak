<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-12 py-2 bg-[#694F8E] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#ffcec2] focus:bg-[#FFDED6] hover:text-black active:bg-[#FFDED6] focus:outline-none focus:ring-2 focus:ring-[#694F8E] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
