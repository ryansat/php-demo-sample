<div style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div style="background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 2rem; width: 100%; max-width: 400px;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <h2 style="color: #333; font-size: 1.8rem; margin: 0;">Welcome Back</h2>
            <p style="color: #666; margin-top: 0.5rem;">Please sign in to your account</p>
        </div>
        
        <form method="POST" action="/auth/login">
            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #555; font-weight: 500;">Username</label>
                <input type="text" id="username" name="username" required 
                       style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 1rem; transition: border-color 0.2s;">
            </div>
            
            <div style="margin-bottom: 2rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #555; font-weight: 500;">Password</label>
                <input type="password" id="password" name="password" required 
                       style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 1rem; transition: border-color 0.2s;">
            </div>
            
            <button type="submit" 
                    style="width: 100%; padding: 0.75rem; background-color: #007bff; color: white; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer; transition: background-color 0.2s;">
                Sign in
            </button>
        </form>
    </div>
</div>