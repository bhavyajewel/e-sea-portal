import { test, expect } from '@playwright/test';

const USER = process.env.ESEA_USERNAME;
const PASS = process.env.ESEA_PASSWORD;
test.skip(!USER || !PASS, 'Set ESEA_USERNAME and ESEA_PASSWORD environment variables to run this test.');

test('Job module - create a job posting', async ({ page }) => {
  // Login
  await page.goto('http://localhost/seaport/index.php/Welcome/login');
  await page.fill('input[name="username"]', USER);
  await page.fill('input[name="password"]', PASS);
  await page.click('button.login-btn');

  // Open jobs page
  await page.goto('http://localhost/seaport/index.php/Welcome/jobss');

  // Read-only assertions (do not submit to avoid DB writes)
  const jobForm = page.locator('form[action$="/Welcome/jobdetails"]').first();
  await expect(jobForm).toBeVisible();
  await expect(jobForm.locator('input[name="jobname"]').first()).toBeVisible();
  await expect(jobForm.locator('select[name="jobcategory"]').first()).toBeVisible();
  await expect(jobForm.locator('select[name="qualification"]').first()).toBeVisible();
});
