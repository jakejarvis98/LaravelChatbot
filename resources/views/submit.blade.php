@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Submit Information</h1>
        </div>
        
        <div class="row">
            <form action="/submit" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif
                
                <div class="form-group">
                    <label for="info_name">Info Name</label>
                    <input type="text" class="form-control @error('info_name') is-invalid @enderror" id="info_name" name="info_name" placeholder="Name" value="{{ old('info_name') }}">
                    @error('info_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="event_name">Event Name</label>
                    <input type="text" class="form-control @error('event_name') is-invalid @enderror" id="event_name" name="event_name" placeholder="Event Name" value="{{ old('event_name') }}">
                    @error('event_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <option value="Sports">Sports</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Business">Business</option>
                        <option value="Trending">Trending</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="industry">Industry:</label>
                    <select id="industry" name="industry">
                        <option value="Film">Film</option>
                        <option value="Music">Music</option>
                        <option value="Medicine">Medicine</option>
                        <option value="Agriculture">Agriculture</option>
                    </select>
                    @error('industry')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="actual_info">Actual Info.</label>
                    <textarea class="form-control @error('actual_info') is-invalid @enderror" id="actual_info" name="actual_info" placeholder="Description">{{ old('actual_info') }}</textarea>
                    @error('actual_info')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="keywords">Keyword</label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords" placeholder="Keyword" value="{{ old('keywords') }}">
                    @error('keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="activity_date">Activity Date</label>
                    <input type="date" id="activity_date" name="activity_date" value="{{ old('activity_date') }}">
                    @error('activity_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="expiry_date">Expiry Date</label>
                    <input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}">
                    @error('expiry_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="related_agency">Related Agency</label>
                    <input type="text" class="form-control @error('related_agency') is-invalid @enderror" id="related_agency" name="related_agency" placeholder="Related Agency" value="{{ old('related_agency') }}">
                    @error('related_agency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="numerical_value">Numerical Value</label>
                    <input type="number" class="form-control @error('numerical_value') is-invalid @enderror" id="numerical_value" name="numerical_value" min="1" value="{{ old('numerical_value') }}">
                    @error('numerical_value')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="other_details">Other Details</label>
                    <textarea class="form-control @error('other_details') is-invalid @enderror" id="other_details" name="other_details" placeholder="Other Details">{{ old('other_details') }}</textarea>
                    @error('other_details')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Enable?</label>
                    <input type="radio" id="yes" name="enabled" value="1">
                    <label for="yes">Yes</label>
                    <input type="radio" id="no" name="enabled" value="0">
                    <label for="no">No</label>
                    @error('enabled')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection