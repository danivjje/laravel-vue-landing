import { createPinia } from 'pinia';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

import MainInput from '@/Components/ui/MainInput.vue';
import MainButton from '@/Components/ui/MainButton.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue');
    return pages[`./Pages/${name}.vue`]();
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .component('MainInput', MainInput)
      .component('MainButton', MainButton)
      .use(plugin)
      .use(createPinia())
      .mount(el)
  },
})

