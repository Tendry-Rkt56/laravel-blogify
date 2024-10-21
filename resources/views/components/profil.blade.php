<div class="profile-card">
    <div class="profile-banner"></div>
    <div class="profile-picture">
        <img src="{{$user->image ? $user->imageUrl() : 'https://via.placeholder.com/150'}}" alt="Profile Picture">
    </div>
    <div class="profile-info">
        <h2>{{$user->name}}</h2>
        <p class="role">{{$user->role == "user" ? "Utilisateur" : 'Administrateur'}}</p>
        <div class="contact-info">
            <div class="contact-item">
                <span class="icon">🏠</span>
                <span class="adresse">{{$user->adresse}}</span>
            </div>
            <div class="contact-item">
                <span class="icon">📧</span>
                <a class="adresse" href="mailto:{{$user->email}}">{{$user->email}}</a>
            </div>
        </div>
    </div>
</div>

