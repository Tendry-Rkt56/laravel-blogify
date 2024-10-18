<div class="profile-card">
    <div class="profile-banner"></div>
    <div class="profile-picture">
        <img src="https://via.placeholder.com/150" alt="Profile Picture">
    </div>
    <div class="profile-info">
        <h2>{{$user->image}}</h2>
        <p class="role">{{$user->role == "user" ? "Utilisateur" : 'Administrateur'}}</p>
        <div class="contact-info">
            <div class="contact-item">
                <span class="icon">🏠</span>
                <span>{{$user->adresse}}</span>
            </div>
            <div class="contact-item">
                <span class="icon">📧</span>
                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
            </div>
        </div>
    </div>
</div>

