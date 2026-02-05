describe('Login and Dashboard Flow', () => {
    it('should login and navigate through dashboard sections', () => {
        // Set viewport to desktop to ensure 'Ingresar' button is visible
        cy.viewport(1280, 800);

        // 1. Visit Home and go to Login
        cy.visit('/');

        // Wait for page load
        cy.wait(1000);

        // Check if we are already logged in or not. 
        cy.get('body').then(($body) => {
            // Check for visibility of Ingresar button (using jQuery filter)
            if ($body.find('button:contains("Ingresar")').filter(':visible').length > 0) {
                // Click visible Ingresar button forcibly
                cy.get('button').contains('Ingresar').filter(':visible').first().click({ force: true });

                // 2. Fill credentials
                cy.get('input[name="email"]').filter(':visible').first().type('admin@nikitos.com', { force: true });
                cy.get('input[name="password"]').filter(':visible').first().type('password', { force: true });

                // 3. Submit
                cy.get('button[type="submit"]').filter(':visible').first().click({ force: true });
            }
        });

        // 4. Verify Dashboard
        cy.url().should('include', '/dashboard');
        cy.contains('Datos del pedido', { timeout: 10000 }).should('be.visible');

        // 5. Check Navigation

        // Click 'Histórico de pedido'
        cy.get('nav a[href*="/dashboard/history"]').filter(':visible').first().click({ force: true });
        cy.url().should('include', '/dashboard/history');
        cy.contains('Nº de Pedido').should('be.visible');

        // Click 'Lista de precios'
        cy.get('nav a[href*="/dashboard/prices"]').filter(':visible').first().click({ force: true });
        cy.url().should('include', '/dashboard/prices');
        cy.contains('Lista de precios').should('be.visible');

        // Click 'Productos' (back to main dashboard)
        // Match using href ending with /dashboard to be specific
        cy.get('nav a[href$="/dashboard"]').filter(':visible').first().click({ force: true });
        cy.url().should('include', '/dashboard');
        // Verify we are back on dashboard by checking the form header
        cy.contains('Datos del pedido').should('be.visible');
    });
});
