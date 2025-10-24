import { test, expect } from '@playwright/test';

const USER = process.env.ESEA_USERNAME;
const PASS = process.env.ESEA_PASSWORD;
test.skip(!USER || !PASS, 'Set ESEA_USERNAME and ESEA_PASSWORD environment variables to run this test.');

test('Cargo module - risk classification', async ({ page }) => {
  // Login
  await page.goto('http://localhost/seaport/index.php/Welcome/login');
  await page.fill('input[name="username"]', USER);
  await page.fill('input[name="password"]', PASS);
  await page.click('button.login-btn');

  // Open exporting channel (company-accessible)
  await page.goto('http://localhost/seaport/index.php/Welcome/exportingchannel');

  // Read-only: verify essential fields are visible; do not submit
  await expect(page.locator('select[name="productcategory"]').first()).toBeVisible();
  await expect(page.locator('select[name="product_subcategory"]').first()).toBeVisible();
  await expect(page.locator('input[name="productname"]').first()).toBeVisible();
  await expect(page.locator('input[name="companyname"]').first()).toBeVisible();
  await expect(page.locator('input[name="exportingcharge"]').first()).toBeVisible();
  await expect(page.locator('input[name="taxamount"]').first()).toBeVisible();
});