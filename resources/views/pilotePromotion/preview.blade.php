@extends('layouts.app')
@vite(['resources/js/app.js','resources/css/layouts.css'])
@section('content')
    <div class="container">
        <h2>Edit Pilote Information</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form id="editPiloteForm" action="{{ route('pilote.update')}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name doit etre unique et inexistent</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <h2>Edit Promotion Information</h2>

            <div class="mb-3">
                <label for="promotion" class="form-label">Promotion</label>
                <select id="promotion" class="form-select" name="promotion_id"></select>
            </div>

            <input type="hidden" id="selectedPromotionId" name="selected_promotion_id">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
                <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/getpromotions') // Corrected URL
                .then(response => response.json())
                .then(data => {
                    console.log(data.promotions)
                    const promotionSelect = document.getElementById('promotion');
                    data.promotions.forEach(promotion => {
                        const option = document.createElement('option');
                        option.value = promotion.id;
                        option.textContent = promotion.nom_promotion; // Corrected key for promotion name
                        promotionSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching promotions:', error));

            // Update hidden input with selected promotion_id
            document.getElementById('promotion').addEventListener('change', function () {
                document.getElementById('selectedPromotionId').value = this.value;

            });
        });
    </script>
    </div>

@endsection

