import { test, expect } from '@playwright/test';

const USER = process.env.ESEA_USERNAME;
const PASS = process.env.ESEA_PASSWORD;
test.skip(!USER || !PASS, 'Set ESEA_USERNAME and ESEA_PASSWORD environment variables to run this test.');

test('Company module - details & payments', async ({ page }) => {
  // Login
  await page.goto('http://localhost/seaport/index.php/Welcome/login');
  await page.fill('input[name="username"]', USER);
  await page.fill('input[name="password"]', PASS);
  await page.click('button.login-btn');

  // Open company updation
  await page.goto('http://localhost/seaport/index.php/Welcome/companyupdation_view');

  // Read-only: verify essential fields are visible; do not submit
  await expect(page.locator('input[name="name"]').first()).toBeVisible();
  await expect(page.locator('textarea[name="address"]').first()).toBeVisible();
  await expect(page.locator('select[name="state"]').first()).toBeVisible();
  await expect(page.locator('select[name="district"]').first()).toBeVisible();
  await expect(page.locator('input[name="contact"]').first()).toBeVisible();
  await expect(page.locator('input[name="email"]').first()).toBeVisible();
  await expect(page.locator('input[type="submit"]').first()).toBeVisible();
});
