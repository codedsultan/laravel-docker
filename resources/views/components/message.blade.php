<div class="flex gap-x-2">
    <img
        src="{{ $message->user->avatar }}"
        alt="{{ $message->user->name }}"
        class="h-10 w-10 rounded-md"
    />

    <div>
        <!-- Meta -->
        <div class="flex items-center gap-x-2">
            <span class="text-lg font-bold">{{ $message->user->name }}</span>

            <time class="text-sm text-gray-600">
                {{ $message->created_at->format("H:i") }}
            </time>
        </div>

        <!-- Message -->
        <div class="text-lg">
            {!! $message->content !!}
        </div>
    </div>
</div>
