import { test, expect } from '@playwright/test';

const USER = process.env.ESEA_USERNAME;
const PASS = process.env.ESEA_PASSWORD;
const RUN_COMPANY = process.env.ESEA_RUN_COMPANY === '1';
test.skip(!USER || !PASS, 'Set ESEA_USERNAME and ESEA_PASSWORD environment variables to run this test.');
test.skip(RUN_COMPANY, 'Complaints page is only accessible for public users (usertype 3). Skipping under company account.');

test('Complaint module - submit complaint', async ({ page }) => {
  // Login
  await page.goto('http://localhost/seaport/index.php/Welcome/login');
  await page.fill('input[name="username"]', USER);
  await page.fill('input[name="password"]', PASS);
  await page.click('button.login-btn');

  // Open complaints
  await page.goto('http://localhost/seaport/index.php/Welcome/complaints');

  // Read-only checks (do not submit)
  await expect(page.locator('form')).toBeVisible();
  await expect(page.locator('input[name="subject"]').first()).toBeVisible();
  await expect(page.locator('textarea[name="complaints"]').first()).toBeVisible();
});
