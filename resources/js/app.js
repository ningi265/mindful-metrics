import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

// Add any custom JavaScript here
document.addEventListener('DOMContentLoaded', () => {
    // Tooltip example
    document.querySelectorAll('[data-tooltip]').forEach(el => {
        el.addEventListener('mouseenter', showTooltip);
        el.addEventListener('mouseleave', hideTooltip);
    });
});

function showTooltip(e) {
    const tooltip = document.createElement('div');
    tooltip.className = 'absolute z-10 bg-black text-white text-xs rounded py-1 px-2';
    tooltip.textContent = e.target.dataset.tooltip;
    e.target.appendChild(tooltip);
}

function hideTooltip(e) {
    const tooltip = e.target.querySelector('div');
    if (tooltip) e.target.removeChild(tooltip);
}