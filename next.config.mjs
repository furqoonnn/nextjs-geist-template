/** @type {import('next').NextConfig} */
const nextConfig = {
  images: {
    remotePatterns: [
      {
        protocol: 'https',
        hostname: 'images.pexels.com',
        pathname: '/photos/**',
      },
    ],
  },
  allowedDevOrigins: [
    'http://38svhw-8000.csb.app'
  ]
}

export default nextConfig
