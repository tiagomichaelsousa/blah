import { useEffect } from 'react'
import AppLayout from '@/components/Layouts/AppLayout'
import Head from 'next/head'
import echo from '@/lib/echo'

const Dashboard = () => {

    useEffect(() => {
        echo.channel('public-broadcast')
            .listen('BroadcastEvent', (e) => {
                console.log(e);
            });
    }, []);

    return (
        <AppLayout
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
            }>

            <Head>
                <title>Laravel - Dashboard</title>
            </Head>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            You're logged in!
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}

export default Dashboard
