<div class="mt-4 flex flex-col gap-6">
    <text class="text-center">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </text>

    @if (session('status') == 'verification-link-sent')
        <text class="text-center font-medium !dark:text-green-400 !text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </text>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <button wire:click="sendVerification" variant="primary" class="w-full">
            {{ __('Resend verification email') }}
        </button>

        <link class="text-sm cursor-pointer" wire:click="logout">
            {{ __('Log out') }}
        </link>
    </div>
</div>
