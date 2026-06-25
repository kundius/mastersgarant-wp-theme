import './src/fonts/Montserrat/stylesheet.css'
import 'normalize.css'
import './src/styles/main.css'
import './src/styles/icons.css'
import './src/styles/modal.css'
import './src/styles/header.css'
import './src/styles/intro.css'
import './src/styles/services.css'
import './src/styles/emergency-departure.css'
import './src/styles/promo.css'
import './src/styles/features.css'
import './src/styles/discount-form.css'
import './src/styles/advantages.css'
import './src/styles/team.css'
import './src/styles/steps.css'
import './src/styles/contacts.css'
import './src/styles/footer.css'
import './src/styles/breadcrumbs.css'

import fslightbox from 'fslightbox'
import { Mask, MaskInput } from 'maska'

import { initStickyHeader } from './src/scripts/sticky-header'
import { initMobileMenu } from './src/scripts/mobile-menu'
import { initCallbackButton } from './src/scripts/callback-button'
import { initFeedbackForm } from './src/scripts/feedback-form'

new MaskInput('[data-maska]')

initStickyHeader()
initMobileMenu()
initCallbackButton()
initFeedbackForm()
