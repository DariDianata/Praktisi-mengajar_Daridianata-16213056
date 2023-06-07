@extends('layouts.main')
	@section('body')
	    <div class="d-flex justify-content-center">
	        <div class="card mt-5">
	            <div class="card-body">
	                <h5 class="card-title">Login</h5>
	                <h6 class="card-subtitle mb-2 text-body-secondary">Silakan masukan email dan password anda untuk masuk</h6>
	                <div class="row">
	                    <form method="POST" action="/login">
	                        @csrf
	                        <div class="mb-3">
	                            <label for="email" class="form-label">Email</label>
	                            <input type="email" class="form-control" id="email" name="email"
	                                placeholder="Masukan Email">
	                        </div>
	                        <div class="mb-3">
	                            <label for="password" class="form-label">Password</label>
	                            <input type="password" class="form-control" id="password" name="password"
	                                placeholder="Masukan Kata Sandi">
	                        </div>
	                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Masuk">
	

	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	@endsection

