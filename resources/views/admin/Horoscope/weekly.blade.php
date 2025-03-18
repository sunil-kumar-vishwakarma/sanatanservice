{{-- resources/views/Horoscope/weekly.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css\Horoscope\weekly.css') }}">
    <div class="container">
        <main class="main-content">
            <div class="header">
                <div class="date-selector">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" name="date" value="2025-03-05">
                </div>
            </div>
            <section class="horoscope-list">
                <table class="horoscope-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Zodiac</th>
                            <th>Lucky Color</th>
                            <th>Lucky Color Code</th>
                            <th>Lucky Number</th>
                            <th>Total Score</th>
                            <th>Physique</th>
                            <th>Status</th>
                            <th>Finances</th>
                            <th>Relationship</th>
                            <th>Career</th>
                            <th>Travel</th>
                            <th>Family</th>
                            <th>Friends</th>
                            <th>Health</th>
                            <th>Response</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pisces</td>
                            <td>rust-brown</td>
                            <td>#993300</td>
                            <td>[13,0]</td>
                            <td>47</td>
                            <td>0</td>
                            <td>51</td>
                            <td>39</td>
                            <td>17</td>
                            <td>48</td>
                            <td>77</td>
                            <td>16</td>
                            <td>17</td>
                            <td>21</td>
                            <td>Vous êtes susceptible d'être confus</td>
                            <td>2025-03-04</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pisces</td>
                            <td>rust-brown</td>
                            <td>#993300</td>
                            <td>[13,0]</td>
                            <td>47</td>
                            <td>0</td>
                            <td>51</td>
                            <td>39</td>
                            <td>17</td>
                            <td>48</td>
                            <td>77</td>
                            <td>16</td>
                            <td>17</td>
                            <td>21</td>
                            <td>No tome decisiones esta semana,</td>
                            <td>2025-03-04</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pisces</td>
                            <td>जंगली भूरा</td>
                            <td>#993300</td>
                            <td>[13,0]</td>
                            <td>47</td>
                            <td>0</td>
                            <td>51</td>
                            <td>39</td>
                            <td>17</td>
                            <td>48</td>
                            <td>77</td>
                            <td>16</td>
                            <td>17</td>
                            <td>21</td>
                            <td>व्यक्तिगत और व्यावसायिक दोनों समस्याओं</td>
                            <td>2025-03-04</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Pisces</td>
                            <td>തുരുമ്പ്-തവിട്ട്</td>
                            <td>#993300</td>
                            <td>[13,0]</td>
                            <td>47</td>
                            <td>0</td>
                            <td>51</td>
                            <td>39</td>
                            <td>17</td>
                            <td>48</td>
                            <td>77</td>
                            <td>16</td>
                            <td>17</td>
                            <td>21</td>
                            <td>വ്യക്തിപരവും തൊഴിൽപരവുമായ പ്രശ്നങ്ങൾ കാരണം നിങ്ങൾ</td>
                            <td>2025-03-04</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Pisces</td>
                            <td>తుప్పు-గోధుమ</td>
                            <td>#993300</td>
                            <td>[13,0]</td>
                            <td>47</td>
                            <td>0</td>
                            <td>51</td>
                            <td>39</td>
                            <td>17</td>
                            <td>48</td>
                            <td>77</td>
                            <td>16</td>
                            <td>17</td>
                            <td>21</td>
                            <td>వ్యక్తిగత మరియు వృత్తిపరమైన సమస్యల కారణంగా</td>
                            <td>2025-03-04</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
@endsection
