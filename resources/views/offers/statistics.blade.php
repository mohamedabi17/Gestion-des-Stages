@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Gestion Des Applications Statistics</h1>
        <div class="row">
            <div class="col-md-6 mb-4">
                <a href="{{ route('offers.stages') }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Total Offers</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $totalOffers }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Total Candidates</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $totalCandidates }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ route('admins.entreprises') }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Total Entreprises</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $totalEntreprises }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ route('admins.etudiants') }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Total Etudiants</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $totalEtudiants }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ route('admins.pilotes') }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Total Pilotes</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $totalPilotes }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Total Evaluation par Pilote</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $totalEvaluationsPilote }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Total Evaluation des entreprise</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $totalEvaluationsEntreprise }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ route('admins.admins') }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Total Admins</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $totalAdmins }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Total Promotions</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $totalPromotions }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add more statistics cards here as needed -->
    </div>
@endsection
