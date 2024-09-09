//countdown timer
// Set the target date 30 days from now
const targetDate = new Date();
targetDate.setDate(targetDate.getDate() + 30);

// Update the countdown timer every second
const timer = setInterval(updateCountdown, 1000);

function updateCountdown() {
  // Get the current date and time
  const currentDate = new Date();

  // Calculate the time difference between the current date and the target date
  const timeDifference = targetDate - currentDate;

  // Calculate days, hours, minutes, and seconds remaining
  const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
  const hours = Math.floor(
    (timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

  //
  document.getElementById("days").innerText = days;
  document.getElementById("hours").innerText = hours;
  document.getElementById("minutes").innerText = minutes;
  document.getElementById("seconds").innerText = seconds;
  // Check if the target date has been reached
  if (timeDifference <= 0) {
    clearInterval(timer); // Stop the timer
    console.log("Countdown timer has expired!");
  }
}

// JavaScript for Animations
// Animation for "Coins Bought" section
const boughtAmountElement = document.getElementById("boughtAmount");
let boughtAmount = 0;

setInterval(() => {
  boughtAmount += 10;
  boughtAmountElement.innerHTML = `<h3>${boughtAmount} <sub class="text-muted f-14">Coins</sub></h3>`;
}, 1000);

// Animation for "Coins Sold" section
const soldAmountElement = document.getElementById("soldAmount");
let soldAmount = 0;

setInterval(() => {
  soldAmount += 5;
  soldAmountElement.innerHTML = `<h3>${soldAmount} <sub class="text-muted f-14">Coins</sub></h3>`;
}, 1500);

// Animation for "Referral Commission" section
const referralCommissionElement = document.getElementById("referralCommission");
let referralCommission = 0;

setInterval(() => {
  referralCommission += 1;
  referralCommissionElement.innerHTML = `<h3>${referralCommission} <sub class="text-muted f-14">Coins</sub></h3>`;
}, 2000);

// Animation for "Next Auction" section
const nextAuctionEntriesElement = document.getElementById("nextAuctionEntries");
let nextAuctionEntries = 300;

setInterval(() => {
  nextAuctionEntries -= 1;
  nextAuctionEntriesElement.innerHTML = `${nextAuctionEntries} <sub class="text-muted f-14">Coins</sub>`;
}, 3000);

// Animation for "Your Coins on Sale" section
const coinsOnSaleElement = document.getElementById("coinsOnSale");
let coinsOnSale = 50;

setInterval(() => {
  coinsOnSale += 2;
  coinsOnSaleElement.innerHTML = `<h3>${coinsOnSale} <sub class="text-muted f-14">Coins</sub></h3>`;
}, 2000);

// Animation for "Users Online" section
const usersOnlineElement = document.getElementById("usersOnline");
let usersOnline = 10;

setInterval(() => {
  usersOnline += Math.floor(Math.random() * 3) - 1; // Randomly increment/decrement
  if (usersOnline < 0) {
    usersOnline = 0; // Ensure it doesn't go negative
  }
  usersOnlineElement.innerHTML = usersOnline;
}, 4000);

// JavaScript File (coins.js)

let coinsBought = 0;

// Function to increment coins bought
function incrementCoinsBought() {
  coinsBought += 10;
  updateCoinsBought();
}

// Function to update the "Coins Bought" section
function updateCoinsBought() {
  const coinsBoughtElement = document.getElementById("coinsBought");
  coinsBoughtElement.innerHTML = `<h3>K${coinsBought} <sub class="text-muted f-14">Coins</sub></h3>`;
}

// Event listener for the "Buy Coins" button
const buyCoinsButton = document.getElementById("buyCoinsButton");
buyCoinsButton.addEventListener("click", incrementCoinsBought);
