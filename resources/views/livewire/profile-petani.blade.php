<div>
    <div class="profile-container">
        @if ($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
        @endif
        <form class="profile-form" wire:submit.prevent="updateProfile">
            <!-- Profile Image -->
            <div class="profile-image-container">
                <div class="profile-image-wrapper">
                    <img src="{{ asset($profileImagePath ?? 'IMG/default-profile.jpg') }}" alt="Profile Image"
                        class="profile-image"
                        @click="{{ $isEditable ? 'triggerFileInput()' : 'showProfileImageModal()' }}">
                    @if ($isEditable)
                    <input type="file" id="profileImageInput" wire:model="profileImage" accept="image/*" hidden>
                    @endif
                </div>
            </div>


            <!-- Modal to View Profile Image -->
            <div id="profileImageModal" class="modal" style="display: none;">
                <span class="close" onclick="closeProfileImageModal()">&times;</span>
                <img class="modal-content" id="modalImage">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" wire:model="name"
                    placeholder="{{ $name ? '' : 'not specified' }}" {{ $isEditable ? '' : 'disabled' }} required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" wire:model="email"
                    placeholder="{{ $email ? '' : 'not specified' }}" {{ $isEditable ? '' : 'disabled' }} required>
            </div>
            <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" id="profession" class="form-control" wire:model="profession"
                    placeholder="{{ $profession ? '' : 'not specified' }}" {{ $isEditable ? '' : 'disabled' }} required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" class="form-control" wire:model="address"
                    placeholder="{{ $address ? '' : 'not specified' }}" {{ $isEditable ? '' : 'disabled' }}
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <select id="region" class="form-control" wire:model="region" {{ $isEditable ? '' : 'disabled' }}
                    required>
                    <option value="{{ $region ? '' : 'not specified' }}">{{ $region ? '' : 'not specified' }}</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Riau">Riau</option>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Bangka Belitung">Bangka Belitung</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Lampung">Lampung</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Banten">Banten</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="DI Yogyakarta">DI Yogyakarta</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Bali">Bali</option>
                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Papua">Papua</option>
                    <option value="Papua Barat">Papua Barat</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" id="contact" class="form-control" wire:model="contact"
                    placeholder="{{ $contact ? '' : 'not specified' }}" {{ $isEditable ? '' : 'disabled' }} required>
            </div>

            <div class="form-group">
                @if ($isEditable)
                <button type="submit" class="btn btn-success">Update</button>
                @else
                <button type="button" class="btn btn-primary" wire:click="toggleEdit">Edit Profile</button>
                @endif
            </div>
        </form>

        <style>
            .profile-image-container {
                display: flex;
                justify-content: center;
                margin-bottom: 15px;
            }

            .profile-image-wrapper {
                position: relative;
                width: 120px;
                height: 120px;
                border-radius: 50%;
                overflow: hidden;
                cursor: pointer;
                border: 2px solid #ddd;
            }

            .profile-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                padding-top: 100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.9);
            }

            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }

            .close {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #fff;
                font-size: 40px;
                font-weight: bold;
                cursor: pointer;
            }

            .close:hover,
            .close:focus {
                color: #bbb;
                text-decoration: none;
            }

            .form-group {
                margin-top: 8px;
            }
        </style>

        <script>
            function triggerFileInput() {
                document.getElementById('profileImageInput').click();
            }

            function showProfileImageModal() {
                const modal = document.getElementById('profileImageModal');
                const modalImg = document.getElementById('modalImage');
                const profileImg = document.querySelector('.profile-image');
                modalImg.src = profileImg.src;
                modal.style.display = 'block';
            }

            function closeProfileImageModal() {
                document.getElementById('profileImageModal').style.display = 'none';
            }
        </script>
    </div>
</div>
