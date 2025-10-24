// setup.spec.js
import { test } from '@playwright/test';

const USER = process.env.ESEA_USERNAME;
const PASS = process.env.ESEA_PASSWORD;
test.skip(!USER || !PASS, 'Set ESEA_USERNAME and ESEA_PASSWORD environment variables to run this test.');

test('User can login and see dashboard', async ({ page }) => {
  await page.goto('http://localhost/seaport/index.php/Welcome/login');
  await page.fill('input[name="username"]', USER);
  await page.fill('input[name="password"]', PASS);
  await page.click('button.login-btn');
  await page.waitForSelector('h2:text("Company Dashboard")');
});
