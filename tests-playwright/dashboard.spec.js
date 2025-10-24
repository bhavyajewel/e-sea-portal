import { test, expect } from '@playwright/test';

const USER = process.env.ESEA_USERNAME;
const PASS = process.env.ESEA_PASSWORD;
test.skip(!USER || !PASS, 'Set ESEA_USERNAME and ESEA_PASSWORD environment variables to run this test.');

test('Dashboard loads correctly', async ({ page }) => {
  // Login
  await page.goto('http://localhost/seaport/index.php/Welcome/login');
  await page.fill('input[name="username"]', USER);
  await page.fill('input[name="password"]', PASS);
  await page.click('button.login-btn');

  // Visit dashboard
  await page.goto('http://localhost/seaport/index.php/Welcome/companyhome');
  await expect(page.locator('h2:text("Company Dashboard")')).toBeVisible();

  // Check summary cards
  await expect(page.locator('.cards .card')).toHaveCount(4);
});
