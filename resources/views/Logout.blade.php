<div class="modal fade" id="logoutModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <div class="modal-content" style="border: none; border-radius: 10px; box-shadow: 0 20px 60px rgba(26,58,107,0.15);">

                <div class="modal-header" style="border-bottom: 1px solid var(--blue-line); padding: 24px 32px 16px;">
                    <h5 class="modal-title" style="font-size: 18px; font-weight: 600; color: var(--blue-deep); font-family: 'DM Sans', sans-serif;">
                        Confirm Logout
                    </h5>
                </div>

                <div class="modal-body" style="padding: 20px 32px; font-family: 'DM Sans', sans-serif; font-size: 13.5px; color: var(--muted);">
                    Are you sure you want to logout?
                </div>

                <div class="modal-footer" style="border-top: 1px solid var(--blue-line); padding: 14px 32px; gap: 8px;">

                    <button type="button"
                        data-bs-dismiss="modal"
                        style="background: transparent; border: 1.5px solid var(--blue-line); border-radius: 6px; font-family: 'DM Sans', sans-serif; font-size: 12px; font-weight: 500; color: var(--muted); padding: 8px 20px; cursor: pointer; transition: background 0.15s;"
                        onmouseover="this.style.background='var(--blue-frost)'"
                        onmouseout="this.style.background='transparent'">
                        Cancel
                    </button>

                    <button type="submit"
                        style="background: #c0392b; color: #ffffff; border: none; border-radius: 6px; font-family: 'DM Sans', sans-serif; font-size: 12px; font-weight: 600; letter-spacing: 0.8px; text-transform: uppercase; padding: 9px 22px; cursor: pointer; transition: background 0.2s;"
                        onmouseover="this.style.background='#a93226'"
                        onmouseout="this.style.background='#c0392b'">
                        Logout
                    </button>

                </div>

            </div>

        </form>

    </div>
</div>