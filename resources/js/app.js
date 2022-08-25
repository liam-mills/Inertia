import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Shared/Layout'

createInertiaApp({
  resolve: name => {
    let page = require(`./Pages/${name}`).default;

    if ( !page.layout ) page.layout = Layout;

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .mount(el)
  },
});

InertiaProgress.init({
  delay: 250,
  color: '#FF0000',
  showSpinner: true,
});