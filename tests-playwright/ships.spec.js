import { test, expect } from '@playwright/test';

const USER = process.env.ESEA_USERNAME;
const PASS = process.env.ESEA_PASSWORD;
const RUN_COMPANY = process.env.ESEA_RUN_COMPANY === '1';
test.skip(!USER || !PASS || !RUN_COMPANY, 'Set ESEA_USERNAME/PASSWORD and ESEA_RUN_COMPANY=1 to run this test.');

test('Ships module - view and interact with ship details', async ({ page }) => {
  // Login
  await page.goto('http://localhost/seaport/index.php/Welcome/login');
  await page.fill('input[name="username"]', USER);
  await page.fill('input[name="password"]', PASS);
  await page.click('button.login-btn');

  // Open ship view
  await page.goto('http://localhost/seaport/index.php/Welcome/shipview');

  await expect(page.locator('table.table-modern')).toBeVisible();

  const rows = page.locator('table.table-modern tbody tr');
  const rowCount = await rows.count();
  expect(rowCount).toBeGreaterThan(0);

  // Read-only: verify "Export Order" action is present on first row
  await expect(rows.nth(0).locator('a:has-text("Export Order")')).toBeVisible();
});
