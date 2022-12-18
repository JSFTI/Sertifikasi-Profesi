import { presetUno, presetAttributify, presetIcons, defineConfig } from 'unocss';

export default defineConfig({
  cli: {
    entry: {
        patterns: [
            'resources/**/*.php',
            'resources/**/*.blade.php',
            'resources/**/*.ts',
            'resources/**/*.js',
            'resources/**/*.vue',
        ],
        outFile: 'public/assets/css/uno.css'
    }
  },
  theme: {
    colors: {
      primary: '#FF0000',
      secondary: '#FFBBB8',
      success: '#39FF14',
      danger: '#ff4141',
      info: '#4589D6',
      warning: '#F2B702',
      neutral: '#F7F8E8'
    }
  },
  shortcuts: [
    {
      'a-btn': 'rounded-1 px-4 py-2 bg-neutral hover:(shadow-md shadow-gray) transition',
    },
    [/^a-btn-(.*)-(.*)$/, ([, theme, shadow]) => {
      return `bg-${theme} hover:shadow-${shadow}`;
    }]
  ],
  presets: [
    presetUno(),
    presetAttributify(),
    presetIcons({
      collections: {
        mdi: () => import('@iconify-json/mdi/icons.json').then(i => i.default)
      }
    })
  ]
});