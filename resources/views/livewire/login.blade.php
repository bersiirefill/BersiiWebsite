<div>
    {{-- Success is as dangerous as failure. --}}
    <div>
        <form class="p-3 p-xl-4" method="POST" enctype="multipart/form-data" wire:submit.prevent="login">
            @csrf
            <div class="mb-3">
                <input class="form-control" type="email" id="Email" name="Email" placeholder="Email" wire:model.lazy="Email">
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" id="Password" name="Password" placeholder="Password" wire:model.lazy="Password">
            </div>
            <div>
                <button class="btn btn-primary shadow d-block w-100" type="submit" id="submit" name="submit" style="background: #01AA4F;border-style: none;">Masuk</button>
            </div>
            <div class="text-right text-opacityf">
                <br>
                <a href="{{ route('lupa_sandi') }}">
                    <p style="text-align: center;">Lupa Password?</p>
                </a>
            </div>
        </form>
    </div>
</div>
