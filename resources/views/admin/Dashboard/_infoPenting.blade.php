<h1 class="text-base md:text-xl font-normal text-left text-gray-900 dark:text-white">Info Penting</h1>

<ul class="flex flex-col mt-4 gap-2">

    @for ($i = 1; $i <= 5; $i++)
        <li class="rounded-lg bg-white shadow-lg dark:bg-gray-700 text-gray-900 dark:text-white list-none" x-data="accordion({{ $i }})">
            <h2 @click="handleClick()"
                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                <span class="text-sm xl:text-base">When will my order arrive?</span>
                <svg :class="handleRotate()"
                    class="fill-current text-main dark:text-white h-6 w-6 transform transition-transform duration-500"
                    viewBox="0 0 20 20">
                    <path
                        d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                    </path>
                </svg>
            </h2>
            <div x-ref="tab" :style="handleToggle()"
                class="border-l-2 border-main dark:border-white overflow-hidden max-h-0 duration-500 transition-all">
                <p class="p-3 text-gray-900 dark:text-white text-sm xl:text-base">
                    Shipping time is set by our delivery partners, according to the delivery method chosen
                    by
                    you.
                    Additional details can be found in the order confirmation
                </p>
            </div>
        </li>
    @endfor

</ul>