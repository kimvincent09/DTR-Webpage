<div class="form-group">
                            <label for="name">Employee Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : ''}}" id="date" name="date" value="{{ old('date', '') }}">
                            @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control {{ $errors->has('time') ? 'is-invalid' : ''}}" id="time" name="time" value="{{ old('time', '') }}">
                            @error('time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                     