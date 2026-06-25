import MicroModal from 'micromodal'

export function applyCallbackButton(el) {
  el.addEventListener('click', (e) => {
    e.preventDefault()

    const modal = document.getElementById('modal-callback')
    const form = modal.querySelector('[data-feedback-form]')
    const titleEl = modal.querySelector('.modal__title')
    const subjectInput = modal.querySelector('input[name="subject"]')

    const origTitle = titleEl.textContent
    const origSubject = subjectInput.value
    const origGoal = form.dataset.feedbackFormGoal

    const goal = el.dataset.callbackButtonGoal
    const title = el.dataset.callbackButtonTitle

    if (goal) form.dataset.feedbackFormGoal = goal
    if (title) {
      titleEl.textContent = title
      subjectInput.value = title
    }

    MicroModal.show('modal-callback', {
      awaitOpenAnimation: true,
      awaitCloseAnimation: true,
      closeTrigger: 'data-modal-close',
      onClose: () => {
        titleEl.textContent = origTitle
        subjectInput.value = origSubject
        form.dataset.feedbackFormGoal = origGoal
      },
    })
  })
}

export function initCallbackButton() {
  const buttons = document.querySelectorAll('[data-callback-button]') || []

  Array.from(buttons).forEach(applyCallbackButton)

  const links = document.querySelectorAll('[href="#callback"]') || []

  Array.from(links).forEach(applyCallbackButton)
}
