import {
  presetUno, presetAttributify, presetIcons, defineConfig,
  transformerVariantGroup, transformerDirectives
} from 'unocss';

export default defineConfig({
  cli: {
    entry: {
        patterns: [
            'resources/**/*.php',
            'resources/**/*.blade.php',
            'resources/**/*.ts',
            'resources/**/*.js',
        ],
        outFile: 'public/assets/css/uno.css'
    }
  },
  theme: {
    colors: {
      primary: '#0d060f',
      secondary: '#1e2824',
      tertiary: '#5d3c18',
      success: '#39FF14',
      danger: '#ff4141',
      info: '#4589D6',
      warning: '#F2B702',
      neutral: '#F7F8E8'
    }
  },
  shortcuts: [
    {
      'a-btn': 'rounded-1 px-4 py-2 bg-secondary hover:(shadow shadow-gray) transition',
    },
  ],
  presets: [
    presetUno(),
    presetAttributify(),
    presetIcons({
      collections: {
        mdi: () => import('@iconify-json/mdi/icons.json').then(i => i.default)
      }
    })
  ],
  transformers: [
    transformerVariantGroup(),
    transformerDirectives()
  ]
});