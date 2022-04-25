<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blueGray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blueGray-700 active:bg-blueGray-900 focus:outline-none focus:border-blueGray-900 focus:ring focus:ring-blueGray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
