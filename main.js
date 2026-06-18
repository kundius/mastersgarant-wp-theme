import './src/fonts/Montserrat/stylesheet.css'
import 'normalize.css'
import './src/styles/main.css'
import './src/styles/icons.css'
import './src/styles/modal.css'
import './src/styles/header.css'
import './src/styles/template-landing.css'

import fslightbox from 'fslightbox'
import { Mask, MaskInput } from 'maska'

import { initStickyHeader } from './src/scripts/sticky-header'
// import { initServices } from './src/scripts/services'
// import { initReviewsEmbla } from './src/scripts/reviews'
// import { initNewsEmbla } from './src/scripts/news'
import { initMobileMenu } from './src/scripts/mobile-menu'
// import { initSlideshow } from './src/scripts/slideshow'
import { initCallbackButton } from './src/scripts/callback-button'
// import { initFeedbackForm } from './src/scripts/feedback-form'
// import { initReviewToggles } from './src/scripts/review-toggle'

new MaskInput('[data-maska]')

initStickyHeader()
// initServices()
// initReviewsEmbla()
// initNewsEmbla()
initMobileMenu()
// initSlideshow()
initCallbackButton()
// initFeedbackForm()
// initReviewToggles()
