<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show your sign to you partner by moving cursor. 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div
                    class="p-6 text-gray-900"
                    x-data="{
                        userPositions: [],
                    }"
                    x-init="
                        const channel = Echo.private('app')

                        let width = window.innerWidth
                        let height = window.innerHeight

                        channel.listenForWhisper('mousemoving', (event)=>{
                            const user = userPositions.find(p => p.user.id === event.user.id)

                            if(typeof user == 'undefined') {
                                userPositions.push(event)
                                return
                            }

                            user.positions = {
                                x: event.positions.x * width,
                                y: event.positions.y * height
                            }


                        })

                        onmousemove = (e) => {
                            channel.whisper('mousemoving', {
                                user: {{ json_encode(auth()->user()->only('id', 'name')) }},
                                positions: {
                                    x: e.x / width,
                                    y: e.y / height
                                }
                            })
                        }
                    "
                    x-ref="heartContainer"
                >

                <template x-for="user in userPositions">
                    <div class="flex items-center absolute leading-none h-3 space-x-1" x-bind:style="`left: ${user.positions.x}px; top: ${user.positions.y}px`">
                        <svg fill="none" preserveAspectRation="none" viewBox="5 5 14 14" class="size-3">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M5.75 5.75L11 18.25L13 13L18.25 11L5.75 5.752"></path>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 13L18.25 18.25"></path>
                        </svg>
                        <span class="text-sm font-semibold" x-text="user.user.name"></span>
                    </div>
                </template>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
