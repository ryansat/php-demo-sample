<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="margin: 0; font-size: 24px; color: #333;">Dashboard</h2>
        <a href="/auth/logout" style="padding: 8px 16px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px;">Logout</a>
    </div>

    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
            <div style="padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: bold; background-color: #f8f9fa;">Admin Actions</div>
            <div style="padding: 20px;">
                <a href="/users/create" style="padding: 8px 16px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">Create New CS User</a>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION['user']['role'] === 'customer_service'): ?>
        <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
            <div style="padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: bold; background-color: #f8f9fa;">Contact Management</div>
            <div style="padding: 20px;">
                <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                    <a href="/contacts/create" style="padding: 8px 16px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">Add New Contact</a>
                    <a href="/contacts/sync" style="padding: 8px 16px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">Sync with Google Contacts</a>
                </div>
            </div>
        </div>

        <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 20px;">
            <div style="padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: bold; background-color: #f8f9fa;">Recent Contacts</div>
            <div style="padding: 20px;">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem;">
                    <thead>
                        <tr>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; background-color: #f8f9fa;">Name</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; background-color: #f8f9fa;">Phone</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; background-color: #f8f9fa;">Email</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6; background-color: #f8f9fa;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td style="padding: 12px; border-bottom: 1px solid #dee2e6;"><?= htmlspecialchars($contact['name']) ?></td>
                                <td style="padding: 12px; border-bottom: 1px solid #dee2e6;"><?= htmlspecialchars($contact['phone']) ?></td>
                                <td style="padding: 12px; border-bottom: 1px solid #dee2e6;"><?= htmlspecialchars($contact['email']) ?></td>
                                <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">
                                    <div style="display: flex; gap: 5px;">
                                        <a href="/contacts/edit/<?= $contact['id'] ?>" style="padding: 4px 8px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; font-size: 14px;">Edit</a>
                                        <a href="https://wa.me/<?= $contact['phone'] ?>" style="padding: 4px 8px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-size: 14px;" target="_blank">WhatsApp</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>