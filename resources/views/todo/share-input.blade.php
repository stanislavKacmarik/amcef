<div class="form-group mb-2" id="share-group">
    <div>
        <label>Sharing with: </label>
        <div class="fs-4 d-inline-block">
            <i id="addShareButton"
               class="bi bi-person-plus-fill text-success"
               title="remove user from sharing"></i>
        </div>
    </div>
    <div id="shared-inputs">
        @if(old('share') != null)
            @foreach( old('share',[]) as $key => $old)
                <div class="row mb-2 share-row">
                    <div class="col">
                        <input type="text" name="share[][email]"
                               class="form-control mb-2 @error('share.'.$key.'.email') is-invalid @enderror"
                               value="{{old('share.'.$key.'.email')}}"
                               placeholder="Add user">
                        @error('share.'.$key.'.email')
                        <span class="invalid-feedback mb-2" role="alert">
                        <strong>user doesn't exist</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="f-0 fs-4">
                        <i class="bi bi-person-fill-x remove-share text-danger"
                           title="remove user from sharing"></i>
                    </div>
                </div>
            @endforeach
        @else
            @if(isset($todo))
                @foreach($todo->sharedUsers as $user)
                    <div class="row mb-2 share-row">
                        <div class="col">
                            <input type="text" name="share[][email]"
                                   class="form-control mb-2"
                                   value="{{$user->email}}"
                                   placeholder="Add user">
                        </div>
                        <div class="f-0 fs-4">
                            <i class="bi bi-person-fill-x remove-share text-danger"
                               title="remove user from sharing"></i>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>


    <div id="share-placeholder">
        <div class="row mb-2 share-row" style="display: none">
            <div class="col">
                <input type="text" name="share[][email]"
                       class="form-control mb-2"
                       disabled
                       placeholder="Add user">
            </div>
            <div class="f-0 fs-4">
                <i class="bi bi-person-fill-x remove-share text-danger"
                   title="remove user from sharing"></i>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        document.getElementById('addShareButton').addEventListener('click', function () {
            let clonedNode = document.querySelector('#share-placeholder .share-row').cloneNode(true);
            clonedNode.querySelector('input').disabled = false;
            clonedNode.querySelector('.remove-share')
                .addEventListener('click', function () {
                    this.closest('.row').remove();
                })
            clonedNode.style.display = '';
            document.getElementById('shared-inputs').appendChild(clonedNode);
        })
        document.querySelectorAll('.share-row').forEach(
            removeElement => {
                removeElement.addEventListener('click', function () {
                    this.closest('.row').remove();
                })
            }
        )
    </script>
@endpush